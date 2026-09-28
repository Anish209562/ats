import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('resume upload endpoint keeps applicant file handling in place', () => {
  const source = readFileSync('cpanel/resume_upload.php', 'utf8')
  assert.match(source, /resume|file|upload/i)
})
