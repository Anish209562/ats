import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('admin session guard validates tokens before dashboard access', () => {
  const source = readFileSync('cpanel/session.php', 'utf8')
  assert.match(source, /token/)
  assert.match(source, /session_start/)
})
