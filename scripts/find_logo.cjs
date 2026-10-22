const fs = require('fs');

// We have the downloaded bundle in temp_inspect or let's search if any logo exists
if (fs.existsSync('temp_inspect/bundle.js')) {
    const code = fs.readFileSync('temp_inspect/bundle.js', 'utf8');
    const logoIdx = code.indexOf('logo');
    console.log('logo idx:', logoIdx);
    const urls = [...code.matchAll(/https:\/\/[^"'`\s)]+/g)].map(m => m[0]);
    const logoUrls = urls.filter(u => u.toLowerCase().includes('logo'));
    console.log('Logo URLs in bundle:', logoUrls);
} else {
    console.log('temp_inspect/bundle.js does not exist');
}
