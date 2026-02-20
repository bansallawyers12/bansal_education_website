# Remove stale Git lock files that can cause "Unable to create index.lock" errors.
# Run this when Git operations fail with lock-related errors.
# Close VS Code / other Git clients before running.

$gitDir = Join-Path $PSScriptRoot ".." ".git"
$locks = @("index.lock", "config.lock")
$removed = 0

foreach ($lock in $locks) {
    $path = Join-Path $gitDir $lock
    if (Test-Path $path) {
        try {
            Remove-Item -Force $path
            Write-Host "Removed: .git\$lock" -ForegroundColor Green
            $removed++
        }
        catch {
            Write-Host "Could not remove .git\$lock - close all Git/IDE windows and try again" -ForegroundColor Yellow
        }
    }
}

if ($removed -eq 0) {
    Write-Host "No lock files found." -ForegroundColor Gray
}
