# Github Issue Action

This action opens a new github issue.

## Inputs

### `token`

**Required** Github Token.

### `title`

**Required** Issue title.

### `body`

Issue body.

### `assignees`

Issue assignees. Passed as a formatted multi-line string using the | character.

## Outputs

### `issue`

The issue object as a json string.

## Example usage

```yaml
uses: ChanManChan/slack-PHP@v1
  with:
    slack_webhook: ${{ secrets.SLACK_WEBHOOK }}
    message: Hello from PHP, Slack
```
