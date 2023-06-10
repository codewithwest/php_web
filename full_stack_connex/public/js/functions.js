

// export default { addToTable }


function addToTable(_prod_id, _brand, _prod_desc, _price, _ratings, _availability) {
    document.querySelector('table').innerHTML +=
        ` <tr class="text-center">
                    <td class="brand m-auto">${_prod_id}</td>
                    <td class="brand m-auto">${_brand}</td>
                    <td class="brand m-auto">${_prod_desc}</td>
                    <td class="brand m-auto">${_price}</td>
                    <td class="brand m-auto">${_ratings}</td>
                    <td class="brand m-auto">${_availability}</td>
                    <td class="center-content">
                        <a class="del-product center-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        <p class="d-none">${_prod_id}</p></a>
                        <a  class="edit-product center-content">

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                        </a>
                    </td>

                </tr>`
}


export { productsList }

let productsList = [
    ['DELL', 'DELL LATITUDE 7430 14" FHD AG 300-NITS INTEL CORE I7-1270P 12-CORE 32GB RAM - 512GB SSD 4 YEARS PROSUPPORT WIN11 PRO', '44000', 'In stock'],
    ['BOSE', 'BOSE MUSIC AMPLIFIER – SPEAKER AMP WITH BLUETOOTH & WI-FI', '21000', 'In stock'],
    ['HP', 'HP REVERB V2 VERSION 2022 G2 VIRTUAL REALITY HEADSET', 14800, 'In stock'],
    ['ACER', 'ACER ASPIRE VERO AV15 - 51 - 7617 15.6" FHD IPS INTEL CORE I7-1195G7', 14400, 'In stock'],
    ['BOSE', 'BOSE SURROUND SPEAKERS 700 COLOR ARCTIC WHITE', 12800, 'In stock'],
    ['META', 'META QUEST 2 ADVANCED ALL-IN-ONE 256GB VIRTUAL REALITY', 12300, 'In stock'],
    ['PICO', 'PICO 4 ALL-IN-ONE VR 256GB HEADSET', 12000, 'In stock'],
    ['PICO', 'PICO 4 ALL-IN-ONE VR 128GB HEADSET', 9300, 'In stock'],
    ['LENOVO', 'LENOVO - TAB P11 PLUS - TABLET - 11" 2K DISPLAY 4GB MEMORY - 128GB', 7200, 'In stock'],
    ['CANON', 'CANON EF 75-300MM F/4-5.6 III TELEPHOTO ZOOM LENS FOR CANON SLR CAMERAS', 6200, 'In stock'],
    ['SMATREE', 'SMATREE META OCULUS QUEST 2 CHARGING DOCK STATION', 1790, 'In stock'],
    ['PLAYSTATION', 'RUGBY CHALLENGE 4 (PS4)', 1200, 'In stock'],
    ['BRAUN', 'BRAUN FACE MINI HAIR REMOVER FS1000, ELECTRIC FACIAL HAIR', 900, 'In stock'],
    ['NIKON', 'PULUZ PLUG BATTERY CHARGER WITH CABLE FOR NIKON EN-EL15', 320, 'In stock'],


]
