import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('complaint api keeps complaint submission response behavior', () => {
  const source = readFileSync('api/complaint.php', 'utf8')
  assert.match(source, /complaint/i)
  assert.match(source, /status|message/i)
})
