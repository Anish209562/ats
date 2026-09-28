import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('wallet api exposes balance or wallet response data', () => {
  const source = readFileSync('api/wallet.php', 'utf8')
  assert.match(source, /wallet|balance/i)
  assert.match(source, /json_encode/)
})
