# 10 – Eine echte Anforderung

**KI erlaubt:** Ja, auch als Agent. Du entscheidest, wie du sie einsetzt.

**Zeit:** Rest der Woche (ca. 1–1,5 Tage inkl. Präsentation)

## Ausgangslage

Das ist unsere Zeiterfassung (dieselbe wie in Aufgabe 09):

- http://10-offene-anforderung.test/zeiten → Liste
- http://10-offene-anforderung.test/zeiten/erfassen → Formular

Heute kam diese Mail rein: **[KUNDENMAIL.md](KUNDENMAIL.md)**

So sehen Anforderungen im Alltag oft aus: kurz, unklar, mit Termin. In dieser Aufgabe geht es nicht nur um Code, sondern darum, **herauszufinden, was eigentlich gebraucht wird**.

## Starten

```bash
composer run setup
npm run dev
php artisan test
```

---

## Aufgabe 10.1 – Rückfragen (noch NICHT programmieren!)

Lies die Mail und überlege: **Was musst du wissen, um das richtig zu bauen?**

- Schreibe deine Fragen in eine neue Datei `RUECKFRAGEN.md`.
- Ordne sie sinnvoll (z.B. nach Thema oder Wichtigkeit).
- Gib die Datei deinem Mentor. Er antwortet stellvertretend für Sandra aus der Buchhaltung.
- Du darfst danach noch einmal nachfragen, wenn etwas unklar bleibt.

> ⚠️ Bitte erst programmieren, wenn du die Antworten hast. Was du nicht fragst, musst du später selbst entscheiden und begründen.

Tipp: Stell dir vor, du bist Sandra. Was machst du mit der Datei, sobald du sie hast?

## Aufgabe 10.2 – Umsetzen

Setze den Export mit den Antworten um.

- KI/Agent ist erlaubt, aber **du** bist verantwortlich für das Ergebnis.
- Schreibe **Tests** für die wichtigsten Regeln.
- Die bestehenden Tests müssen grün bleiben.
- Wo du selbst entscheiden musstest, schreibst du die Entscheidung und eine kurze Begründung in `RUECKFRAGEN.md` (Abschnitt „Meine Entscheidungen“).
- Committe in sinnvollen Schritten.

## Aufgabe 10.3 – Präsentation (Freitag, 15 Minuten)

Stell dem Team vor, was du gebaut hast. Leitfragen:

1. **Was** hast du gebaut? Kurze Live-Demo.
2. **Welche Rückfragen** hast du gestellt, und warum gerade diese? Welche Antwort hat dich überrascht?
3. **Was hat die KI gut gemacht, was schlecht?** Ein konkretes Beispiel, wo du ihr widersprechen oder etwas korrigieren musstest.
4. **Wie weisst du**, dass dein Export korrekt ist?
5. **Was würdest du nächstes Mal anders machen?**

Folien sind nicht nötig. Demo und eine Notiz-Datei reichen.

---

## Abgabe

- `RUECKFRAGEN.md` (Fragen, Antworten, eigene Entscheidungen)
- Code + Tests, committet
- Präsentation
