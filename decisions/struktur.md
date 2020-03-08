# Struktur

## Usage
- beim Erstellen eines Dokuments sollen bei relationen bestehende durchsucht werden. Im Popover sollte angeboten werden die Relation neu zu erstellen.

## Models

### Actor (Akteure)

- name
- description
- url

Akteur stellt dar: z.B. Autoren, Herausgeber, generelle Akteure (z.B. BRD)

Wir erstellen separate Models die allerdings alle die gleiche Tabelle nutzen:
- Actor, Author, Publisher, Principal
- für jedes model ein many-to-many pivot table
- Tabelle: actors

### Tag
- parent_id
- name
- color

Mindestens zwei Root Tags:
- Location
- Misc

### Document
- title
- subtitle
- abstract
- release_date
- language_code
- media_type_id
- author (many-to-many)
- publisher (many-to-many)
- principal (many-to-many)
- actor (many-to-many)
- link (many-to-one)

### Link
- document_id
- title
- url
