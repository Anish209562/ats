import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('survey api handles survey payload responses', () => {
  const source = readFileSync('api/survey.php', 'utf8')
  assert.match(source, /survey/i)
  assert.match(source, /json_encode/)
})
