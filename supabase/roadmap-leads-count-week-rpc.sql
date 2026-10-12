-- Run this once in the Supabase SQL editor for the asherrobinsonfitness
-- project (utscsmwenhzrpdqvwvcz) — same project and same roadmap_leads
-- table the existing roadmap_leads_count RPC already reads, just scoped to
-- the last 7 days via the table's existing created_at column instead of an
-- all-time count.
--
-- Powers the "<n> men requested in the past week" pill on the /roadmap/b/
-- split-test variant (roadmap/b/index.html). Callable with the public
-- anon/publishable key, same as roadmap_leads_count, without granting that
-- key SELECT on roadmap_leads itself.

create or replace function public.roadmap_leads_count_week()
returns bigint
language sql
security definer
set search_path = public
as $$
  select count(*)
  from public.roadmap_leads
  where created_at >= now() - interval '7 days';
$$;

grant execute on function public.roadmap_leads_count_week() to anon;
