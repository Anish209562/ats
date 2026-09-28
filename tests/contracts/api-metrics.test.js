import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('metrics endpoint exposes prometheus style metrics text', () => {
  const source = readFileSync('api/metrics.php', 'utf8')
  assert.match(source, /TYPE ats_app_info gauge/)
  assert.match(source, /metrics|app_info/)
})
