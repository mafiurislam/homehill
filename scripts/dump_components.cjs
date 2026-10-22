async function dumpExactComponents() {
    const res = await fetch('https://hillshome-1.base44.app/assets/index-CMIX8L4x.js');
    const code = await res.text();

    function getFunc(name) {
        let idx = code.indexOf(`function ${name}(`);
        if (idx === -1) idx = code.indexOf(`var ${name}=`);
        if (idx !== -1) {
            return code.slice(idx, idx + 3500);
        }
        return null;
    }

    const comps = ['cE', 'dE', 'AE', 'yE', 'vE', 'bE', 'CE', 'kE', 'WE'];
    for (const c of comps) {
        const text = getFunc(c);
        if (text) {
            require('fs').writeFileSync(`scripts/dump_${c}.js`, text);
            console.log(`Saved dump_${c}.js`);
        }
    }
}
dumpExactComponents();
