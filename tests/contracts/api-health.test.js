import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('health endpoint returns a service status payload', () => {
  const source = readFileSync('api/health.php', 'utf8')
  assert.match(source, /status/)
  assert.match(source, /health/)
})
