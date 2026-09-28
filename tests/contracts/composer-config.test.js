import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('composer exposes maintenance scripts', () => {
  const composer = JSON.parse(readFileSync('composer.json', 'utf8'))
  assert.equal(composer.scripts.lint.includes('phpcs'), true)
  assert.equal(composer.scripts.typecheck.includes('phpstan'), true)
})
