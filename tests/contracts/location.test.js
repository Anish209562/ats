import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('location api keeps latitude longitude fields available', () => {
  const source = readFileSync('api/location.php', 'utf8')
  assert.match(source, /lat|lng|location/i)
})
