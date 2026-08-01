# ADR 0001: Laravel + PostgreSQL API sample

- Status: Accepted
- Date: 2026-08-01
- Deciders: portfolio sample S2

## Context

Research card S2 targets CrowdWorks / fixed-price Laravel work: add an outbound API integration module with tests and a clear README case study. The global default stack prefers FastAPI for greenfield APIs; this sample must demonstrate Laravel specifically.

## Decision

Use **Laravel 12** + **PostgreSQL 16** (Docker Compose locally; managed Postgres on Render) for this repository. Document the stack in `docs/agents/stack.md`. Do not mix NestJS into this repo.

## Consequences

- Requires Laravel ADR (this file) because the choice is outside `default-stack` FastAPI.
- Host PHP may lack `pdo_pgsql`; local run/tests go through Docker (`docker compose`).
- Render deploy uses a Docker runtime (Blueprint + Dockerfile), not native Node.
