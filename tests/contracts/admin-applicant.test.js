import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('applicant flow keeps duplicate detection helpers available', () => {
  const source = readFileSync('cpanel/db.php', 'utf8')
  assert.match(source, /ats_find_duplicate_applicant/)
  assert.match(source, /ats_normalize_mobile/)
})
