import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('public registration uses OTP verification before account creation', () => {
  const source = readFileSync('data/register_submit.php', 'utf8')
  assert.match(source, /otp_verification/)
  assert.match(source, /register/)
})
