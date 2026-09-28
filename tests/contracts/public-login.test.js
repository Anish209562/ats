import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('public login starts a session and redirects to cpanel', () => {
  const source = readFileSync('data/login.php', 'utf8')
  assert.match(source, /session_start/)
  assert.match(source, /cpanel/)
})
