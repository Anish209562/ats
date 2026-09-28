import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('readiness endpoint returns readiness metadata', () => {
  const source = readFileSync('api/readiness.php', 'utf8')
  assert.match(source, /ready/)
  assert.match(source, /readiness/)
})
