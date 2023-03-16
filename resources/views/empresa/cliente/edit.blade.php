         0x03
#define CPLD_LCD1_COMMAND_CLR          0x13

#define CPLD_MISC_SET                  0x07
#define CPLD_MISC_CLR                  0x17
#define CPLD_MISC_LOON_NRESET_BIT      0
#define CPLD_MISC_LOON_UNSUSP_BIT      1
#define CPLD_MISC_RUN_5V_BIT           2
#define CPLD_MISC_CHG_D0_BIT           3
#define CPLD_MISC_CHG_D1_BIT           4
#define CPLD_MISC_DAC_NCS_BIT          5

#define CPLD_LCD_SET                   0x08
#define CPLD_LCD_CLR                   0x18
#define CPLD_LCD_BACKLIGHT_EN_0_BIT    0
#define CPLD_LCD_BACKLIGHT_EN_1_BIT    1
#define CPLD_LCD_LED_RED_BIT           4
#define CPLD_LCD_LED_GREEN_BIT         5
#define CPLD_LCD_NRESET_BIT            7

#define CPLD_LCD_RO_SET                0x09
#define CPLD_LCD_RO_CLR                0x19
#define CPLD_LCD_RO_LCD0_nWAIT_BIT     0
#define CPLD_LCD_RO_LCD1_nWAIT_BIT     1

#define CPLD_SERIAL_SET                0x0a
#define CPLD_SERIAL_CLR                0x1a
#define CPLD_SERIAL_GSM_RI_BIT         0
#define CPLD_SERIAL_GSM_CTS_BIT        1
#define CPLD_SERIAL_GSM_DTR_BIT        2
#define CPLD_SERIAL_LPR_CTS_BIT        3
#define CPLD_SERIAL_TC232_CTS_BIT      4
#define CPLD_SERIAL_TC232_DSR_BIT      5

#define CPLD_SROUTING_SET              0x0b
#define CPLD_SROUTING_CLR              0x1b
#define CPLD_SROUTING_MSP430_LPR       0
#define CPLD_SROUTING_MSP430_TC232     1
#define CPLD_SROUTING_MSP430_GSM       2
#define CPLD_SROUTING_LOON_LPR         (0 << 4)
#define CPLD_SROUTING_LOON_TC232       (1 << 4)
#define CPLD_SROUTING_LOON_GSM         (2 << 4)

#define CPLD_AROUTING_SET              0x0c
#define CPLD_AROUTING_CLR              0x1c
#define CPLD_AROUTING_MIC2PHONE_BIT    0
#define CPLD_AROUTING_PHONE2INT_BIT    1
#define CPLD_AROUTING_PHONE2EXT_BIT    2
#define CPLD_AROUTING_LOONL2INT_BIT    3
#define CPLD_AROUTING_LOONL2EXT_BIT    4
#define CPLD_AROUTING_LOONR2PHONE_BIT  5
#define CPLD_AROUTING_LOONR2INT_BIT    6
#define CPLD_AROUTING_LOONR2EXT_BIT    7

/* Balloon3 Interrupts */
#define BALLOON3_IRQ(x)		(IRQ_BOARD_START + (x))

#define BALLOON3_AUX_NIRQ	PXA_GPIO_TO_IRQ(BALLOON3_GPIO_AUX_NIRQ)
#define BALLOON3_CODEC_IRQ	PXA_GPIO_TO_IRQ(BALLOON3_GPIO_CODE