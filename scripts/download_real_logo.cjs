async function downloadRealLogo() {
    const url = 'https://media.base44.com/images/public/user_69fa13388b8cf0a8e8edf81e/8f863328c_image.png';
    const res = await fetch(url);
    if (res.ok) {
        const buffer = await res.arrayBuffer();
        require('fs').writeFileSync('public/images/logo_real.png', Buffer.from(buffer));
        console.log('Saved logo_real.png, size:', buffer.byteLength);
    } else {
        console.log('Failed:', res.status);
    }
}
downloadRealLogo();
