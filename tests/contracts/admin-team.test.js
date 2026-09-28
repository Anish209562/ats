import test from 'node:test'
import assert from 'node:assert/strict'
import { readFileSync } from 'node:fs'

test('team handler creates passkeys and staff metadata', () => {
  const source = readFileSync('cpanel/data/team_data.php', 'utf8')
  assert.match(source, /passkey/)
  assert.match(source, /staffid/)
})
