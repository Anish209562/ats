import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('environment template documents database and provider configuration', () => {
  const source = readFileSync('.env.example', 'utf8')
  assert.match(source, /DB_HOST/)
  assert.match(source, /SMS_PROVIDER_TOKEN/)
})
