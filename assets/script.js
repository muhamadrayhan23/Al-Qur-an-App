
function loadSurah(surahNumber) {
    fetch(`https://api.alquran.cloud/v1/surah/${surahNumber}`)
        .then(response => response.json())
        .then(data => {
            const surah = data.data;
            let content = `<h2>${surah.name} (${surah.englishName})</h2>`;
            content += `<p>${surah.englishNameTranslation}</p>`;
            surah.ayahs.forEach(ayah => {
                content += `<p><strong>${ayah.numberInSurah}.</strong> ${ayah.text}</p>`;
            });
            document.getElementById('surahContent').innerHTML = content;
            document.getElementById('surahContent').scrollIntoView({
                behavior: 'smooth'
            });
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('surahContent').innerHTML = '<p>Terjadi kesalahan saat memuat surat. Silakan coba lagi.</p>';
        });
}
