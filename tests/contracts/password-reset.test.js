import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('password reset handlers keep OTP and update flows present', () => {
  const forgot = readFileSync('api/forgot.php', 'utf8')
  const verify = readFileSync('data/verify-email.php', 'utf8')
  assert.match(forgot, /otp/)
  assert.match(verify, /otp_verification/)
})
