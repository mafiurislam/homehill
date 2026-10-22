async function getLogo() {
    try {
        const res = await fetch('https://hillshome-1.base44.app/assets/index-CMIX8L4x.js');
        const code = await res.text();
        const urls = [...code.matchAll(/https:\/\/[^"'`\s)]+/g)].map(m => m[0]);
        console.log('URLs containing png, jpg, svg:', urls.filter(u => u.includes('.png') || u.includes('.svg') || u.includes('.jpg')));
        
        // Also look for navbar component in code
        const navIdx = code.indexOf('About Us');
        if (navIdx !== -1) {
            console.log('Around navbar:', code.slice(navIdx - 400, navIdx + 100));
        }
    } catch (e) {
        console.error(e);
    }
}
getLogo();
