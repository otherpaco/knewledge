# Knewledge

An open source knowledge base platform to organize background information on scientific topics. E.g. papers and articles on raw resource extraction sorted by affected countries.

## Build

```bash
git clone <this repo>
cd knewledge
composer install
npm run build
cp .env.example .env
```

Edit `.env` to suit your needs. You need to at least set up a database.
