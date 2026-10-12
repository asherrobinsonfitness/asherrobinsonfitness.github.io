#!/usr/bin/env python3
"""Update the save-contact number everywhere it appears.

Usage: python3 scripts/set-contact-number.py +15555550123   (needs: pip3 install segno)

Updates: asher-robinson.vcf (TEL line), meeting/index.html (visible number + desktop QR code).
"""
import re, sys
from pathlib import Path
import segno

ROOT = Path(__file__).resolve().parent.parent
digits = re.sub(r"\D", "", sys.argv[1]) if len(sys.argv) > 1 else ""
if len(digits) == 10:
    digits = "1" + digits
if len(digits) != 11 or not digits.startswith("1"):
    sys.exit("Pass a US number, e.g. +15555550123")
e164 = "+" + digits
shown = f"({digits[1:4]}) {digits[4:7]}-{digits[7:]}"

# vcf (keeps the photo, only swaps the number)
vcf = ROOT / "asher-robinson.vcf"
t = vcf.open(newline="").read()
t, n = re.subn(r"TEL;TYPE=CELL:[^\r\n]*", f"TEL;TYPE=CELL:{e164}", t)
assert n == 1, "TEL line not found in vcf"
vcf.open("w", newline="").write(t)

# QR carries the card directly (no photo, keeps it easy to scan)
card = f"BEGIN:VCARD\nVERSION:3.0\nFN:Asher Robinson\nTEL;TYPE=CELL:{e164}\nEND:VCARD"


def dot_svg(m):
    """Round dots plus rounded finder squares; no quiet zone (the card's padding is it)."""
    n = len(m)
    finder = lambda r, c: (r < 8 and c < 8) or (r < 8 and c >= n - 8) or (r >= n - 8 and c < 8)
    # a zero-length line with round caps draws one dot per module
    d = "".join(f"M{c}.5 {r}.5h0" for r in range(n) for c in range(n) if m[r][c] and not finder(r, c))
    corners = [(0, 0), (n - 7, 0), (0, n - 7)]
    rings = "".join(f'<rect x="{x}.5" y="{y}.5" width="6" height="6" rx="1.6"/>' for x, y in corners)
    eyes = "".join(f'<rect x="{x + 2}" y="{y + 2}" width="3" height="3" rx=".8"/>' for x, y in corners)
    return (f'<svg viewBox="0 0 {n} {n}" role="img" aria-label="QR code to save my contact">'
            f'<path d="{d}" stroke="#111" stroke-width=".86" stroke-linecap="round"/>'
            f'<g fill="none" stroke="#111">{rings}</g><g fill="#111">{eyes}</g></svg>')


svg = dot_svg(segno.make(card, error="l").matrix)

page = ROOT / "meeting" / "index.html"
h = page.read_text()
h, n1 = re.subn(r'(<div class="save-corner__qr">).*?(</div>)', lambda m: m.group(1) + svg + m.group(2), h, count=1, flags=re.S)
h, n2 = re.subn(r'(<p class="save-contact__number">)[^<]*(</p>)', lambda m: m.group(1) + shown + m.group(2), h, count=1)
assert n1 == 1 and n2 == 1, "markup not found in meeting/index.html"
page.write_text(h)
print(f"Set {shown} ({e164})")
