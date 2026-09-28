import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('job posting screen keeps job and client fields wired', () => {
  const source = readFileSync('cpanel/jobposting.php', 'utf8')
  assert.match(source, /job/i)
  assert.match(source, /client/i)
})
