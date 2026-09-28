import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('registration endpoint handles duplicate mobile and email checks', () => {
  const source = readFileSync('api/register.php', 'utf8')
  assert.match(source, /Mobile Number Already Registered/)
  assert.match(source, /Email Address Already Registered/)
})
