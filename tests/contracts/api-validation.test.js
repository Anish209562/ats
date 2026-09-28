import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('validation helper exposes required-field checks', () => {
  const source = readFileSync('api/validation.php', 'utf8')
  assert.match(source, /ats_jsonschema_validate/)
  assert.match(source, /is required/)
})
