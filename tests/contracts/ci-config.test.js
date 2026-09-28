import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('ci config runs lint typecheck test and audit stages', () => {
  const source = readFileSync('.circleci/config.yml', 'utf8')
  assert.match(source, /Lint/)
  assert.match(source, /Typecheck/)
  assert.match(source, /Dependency audit/)
})
