import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('admin login handler maintains staff and admin branches', () => {
  const source = readFileSync('cpanel/data/login.php', 'utf8')
  assert.match(source, /typess/)
  assert.match(source, /staff|admin/)
})
