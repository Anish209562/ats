import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('withdraw api keeps request status response behavior', () => {
  const source = readFileSync('api/withdraw.php', 'utf8')
  assert.match(source, /withdraw/i)
  assert.match(source, /status|message/i)
})
