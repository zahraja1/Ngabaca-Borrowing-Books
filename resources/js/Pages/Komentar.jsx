import React from 'react'

export default function Komentar() {
  return (
    <div>
      <div id="disqus_thread"></div>
      <div>
        {
          (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://ngabaca-1.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })()
        }
      </div>
    </div>
  )
}
