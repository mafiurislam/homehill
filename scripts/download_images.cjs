const fs = require('fs');
const path = require('path');

const images = {
  hero: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/c694b7aec_generated_198bcec0.jpg',
  darjeeling: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/d23ec8656_generated_3f7fc3a1.jpg',
  sikkim: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/5a5000c04_generated_9f1a95b2.jpg',
  northBengal: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/a31448355_generated_e90bb133.jpg',
  dooars: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/56dc553fd_generated_5a7e2b29.jpg',
  bhutan: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/6263bbad7_generated_0023d16e.jpg',
  kashmir: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/2446906a6_generated_7b13215b.jpg',
  himachal: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/574d8ce32_generated_3a1c917c.jpg',
  goa: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/a915f1420_generated_f3aaa27c.jpg',
  rajasthan: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/ad3a8676e_generated_1d2fb925.jpg',
  northeast: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/4b003b861_generated_45cfa83c.jpg',
  aboutTeam: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/4d916fc06_generated_f6cfd5ef.jpg',
  groupTour: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/8da5d2fc0_generated_8c20bd28.jpg',
  customisedTour: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/aec9b25b2_generated_04f0b624.jpg',
  corporateTour: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/2ea6235b2_generated_2b6ca1e4.jpg',
  excursion: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/e9efbb9e3_generated_adf02b15.jpg',
  southIndia: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/e58e7f5ce_generated_image.png',
  southBengal: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/988977fcb_generated_image.png',
  andaman: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/01f5d2b48_generated_image.png',
  logo: 'https://media.base44.com/images/public/6ac65e66d161befc853e1afc/63bec92ea_logo.png/v1/fit/w_180,h_180/63bec92ea_logo.png'
};

const targetDir = path.join(__dirname, '..', 'public', 'images');
if (!fs.existsSync(targetDir)) {
  fs.mkdirSync(targetDir, { recursive: true });
}

async function run() {
  for (const [key, url] of Object.entries(images)) {
    const ext = url.includes('.png') ? '.png' : '.jpg';
    const filePath = path.join(targetDir, `${key}${ext}`);
    try {
      const res = await fetch(url);
      if (res.ok) {
        const buffer = await res.arrayBuffer();
        fs.writeFileSync(filePath, Buffer.from(buffer));
        console.log(`Saved ${key}${ext} (${buffer.byteLength} bytes)`);
      } else {
        console.error(`Failed ${key}: status ${res.status}`);
      }
    } catch (err) {
      console.error(`Error ${key}: ${err.message}`);
    }
  }
}

run();
