import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('docker compose defines web and database services', () => {
  const source = readFileSync('docker-compose.yml', 'utf8')
  assert.match(source, /web:/)
  assert.match(source, /db:/)
})
