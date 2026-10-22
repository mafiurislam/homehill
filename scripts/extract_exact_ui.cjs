async function extractComponents() {
    const res = await fetch('https://hillshome-1.base44.app/assets/index-CMIX8L4x.js');
    const code = await res.text();

    // 1. Search for "Book Your Trip" drawer
    const bookIdx = code.indexOf('Book Your Trip');
    console.log('Book Your Trip index:', bookIdx);
    if (bookIdx !== -1) {
        console.log('--- BOOK YOUR TRIP DRAWER ---');
        console.log(code.slice(bookIdx - 300, bookIdx + 2000));
    }

    // 2. Search for "Plan Your Next Adventure" card
    const cardIdx = code.indexOf('Plan Your Next Adventure');
    console.log('Plan Your Next Adventure index:', cardIdx);
    if (cardIdx !== -1) {
        console.log('--- PLAN YOUR NEXT ADVENTURE SECTION ---');
        console.log(code.slice(cardIdx - 100, cardIdx + 2500));
    }
}
extractComponents();
