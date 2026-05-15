import { NextResponse } from 'next/server'

export function middleware(request) {
  if (request.nextUrl.pathname !== '/') return NextResponse.next()

  const existing = request.cookies.get('ab_variant')?.value
  const variant = existing || (Math.random() < 0.5 ? 'a' : 'b')

  const response = NextResponse.rewrite(
    new URL(`/index-${variant}.html`, request.url)
  )

  if (!existing) {
    response.cookies.set('ab_variant', variant, { maxAge: 60 * 60 * 24 * 30 })
  }

  return response
}

export const config = { matcher: '/' }
