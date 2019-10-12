# Git Nutzung

## Workflow eigener Code

1. Neue Branch erstellen
    `git checkout -b name`
    Als Name z.B. `feature-search` oder `fix-pulldownmenu`
2. *hack hack*
3. Branch auf Server pushen.
    `git push origin name`
4. Auf Git-Server PR erstellen und kommentieren.

## Workflow Review/Merge

1. Wenn Code okay, dann mit lgtm (looks good me) kommentieren.
2. Wenn gemerged werden soll, vorher einen rebase auf master machen
    `git pull --rebase origin master`
3. Dann mergen
    `git checkout master`
    `git merge name`
4. Gemergte Branch löschen
    ```
    git branch -D name
    git push origin --delete name 
    ```
