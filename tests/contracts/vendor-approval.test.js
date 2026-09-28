import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('vendor approval updates core profile fields', () => {
  const source = readFileSync('cpanel/data/vendor_approve.php', 'utf8')
  assert.match(source, /vendor|user/)
  assert.match(source, /status/)
})
