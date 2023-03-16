transform', {}], '--tw-scale-y', ['transform', cssTransformValue]],
        ],
      ],
    ],
    { supportsNegativeValues: true }
  ),

  transform: ({ addDefaults, addUtilities }) => {
    addDefaults('transform', {
      '--tw-translate-x': '0',
      '--tw-translate-y': '0',
      '--tw-rotate': '0',
      '--tw-skew-x': '0',
      '--tw-skew-y': '0',
      '--tw-scale-x': '1',
      '--tw-scale-y': '1',
    })

    addUtilities({
      '.transform': { '@defaults transform': {}, transform: cssTransformValue },
      '.transform-cpu': {
        transform: cssTransformValue,
      },
      '.transform-gpu': {
        transform: cssTransformValue.replace(
          'translate(var(--tw-translate-x), var(--tw-translate-y))',
          'translate3d(var(--tw-translate-x), var(--tw-translate-y), 0)'
        ),
      },
      '.transform-none': { transform: 'none' },
    })
  },

  animation: ({ matchUtilities, theme, config }) => {
    let prefixName = (name) => `${config('prefix')}${escapeClassName(name)}`
    let keyframes = Object.fromEntries(
      Object.entries(theme('keyframes') ?? {}).map(([key, value]) => {
        return [key, { [`@keyframes ${prefixName(key)}`]: value }]
      })
    )

    matchUtilities(
      {
        animate: (value) => {
          let animations = parseAnimationValue(value)

       