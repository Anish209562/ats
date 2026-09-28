import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('readme includes setup, environment and architecture sections', () => {
  const source = readFileSync('README.md', 'utf8')
  assert.match(source, /Setup/)
  assert.match(source, /Environment/)
  assert.match(source, /Architecture/)
})
