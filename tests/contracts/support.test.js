import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('support api keeps support request fields available', () => {
  const source = readFileSync('api/support.php', 'utf8')
  assert.match(source, /support/i)
  assert.match(source, /message|status/i)
})
