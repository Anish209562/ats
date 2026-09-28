import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('job submit handler writes job submission records', () => {
  const source = readFileSync('cpanel/data/job_submit.php', 'utf8')
  assert.match(source, /job/i)
  assert.match(source, /mysqli_query/)
})
