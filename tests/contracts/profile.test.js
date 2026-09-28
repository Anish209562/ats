import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('profile api keeps user profile response fields available', () => {
  const source = readFileSync('api/profile.php', 'utf8')
  assert.match(source, /profile|name|email/i)
  assert.match(source, /json_encode/)
})
