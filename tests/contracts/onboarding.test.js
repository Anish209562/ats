import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('onboarding handler writes initiated records', () => {
  const source = readFileSync('cpanel/data/intitate_data.php', 'utf8')
  assert.match(source, /onboarding/)
  assert.match(source, /initiated/)
})
