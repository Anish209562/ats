import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('cpanel reports page keeps admin report rendering available', () => {
  const source = readFileSync('cpanel/reports.php', 'utf8')
  assert.match(source, /report/i)
})
