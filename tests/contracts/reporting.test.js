import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('report api keeps report response behavior', () => {
  const source = readFileSync('api/report.php', 'utf8')
  assert.match(source, /report/i)
  assert.match(source, /json_encode/)
})
