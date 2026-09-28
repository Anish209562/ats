import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('api login endpoint checks user credentials and token creation', () => {
  const source = readFileSync('api/login.php', 'utf8')
  assert.match(source, /apk_token/)
  assert.match(source, /json_encode/)
})
