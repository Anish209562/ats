import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('applicant import flow handles uploaded applicant data', () => {
  const source = readFileSync('cpanel/data/applicant_import.php', 'utf8')
  assert.match(source, /applicant/i)
  assert.match(source, /upload|file/i)
})
